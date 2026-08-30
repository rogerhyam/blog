---
title: "European Natural History Collections - What's Missing?"
date: 2011-06-21
categories: 
  - "biodiv"
  - "synthesys"
---

I am working on improving the metadata on European natural history collections as part of the [Synthesys](http://www.synthesys.info/) project. In an earlier post  ([Big Collections First](http://www.hyam.net/blog/archives/1235)) I did an analysis of the data in the [Biodiversity Collections Index](http://www.biodiversitycollectionsindex.org/). I am now building a more detailed list of those large collections (the ones believed to contain more than a million 'specimens') of which there appear to be around sixty. These  account for most of the biodiversity material in museums in Europe.

As I worked through the list I began to match them up against data sources in the [GBIF Data Portal](http://data.gbif.org/) but this task became tricky as there were data sources in GBIF that had the names of museums but were clearly the results of observational studies and not catalogues of specimens. I decided to break off and do an analysis of what was in the GBIF Data Portal by way of specimens residing in Europe. This post is the results of that analysis. <!--more-->

## GBIF Metadata Web Services

GBIF provides web services to access metadata on the data it harvests.  I extracted details of data sets hosted in Europe from these services. GBIF use three terms:

- **Data Resource** (a.k.a. Data Set) - the actual data set containing occurrence/specimen records. [Metadata available through this web service](http://data.gbif.org/ws/rest/resource/help/).
- **Data Provider** - the organisation supplying the data. Each data resource belongs to a single data provider. [Metadata available through this web service](http://data.gbif.org/ws/rest/provider/help/).
- **Data Network** \- a collection of data resources often arranged on a geographic or political basis. A data resource can belong to multiple networks.

I was interested in the actual data resources but they don't have a notion of where they are located so I started by querying the data provider service to get a list of data providers (and their resources) for each of the countries in Europe. I then called the resource service to get the metadata for each resource thus building a list of all the resources in Europe. Here is a list of the all countries and the number of resources they have.

| **Country** | **Code** | **Resources** |
| :-- | :-- | --: |
| Germany | DE | 8660 |
| United Kingdom | GB | 368 |
| Spain | ES | 155 |
| Poland | PL | 98 |
| Norway | NO | 68 |
| Finland | FI | 45 |
| Denmark | DK | 44 |
| Netherlands | NL | 41 |
| France | FR | 38 |
| Ireland | IE | 38 |
| Belgium | BE | 36 |
| Austria | AT | 13 |
| Switzerland | CH | 11 |
| Andorra | AD | 7 |
| Portugal | PT | 7 |
| Slovenia | SI | 5 |
| Iceland | IS | 4 |
| Estonia | EE | 2 |
| Luxembourg | LU | 1 |
| Slovakia | SK | 1 |
| Sweden | SE | 1 |
| Åland Islands | AX | 0 |
| Albania | AL | 0 |
| Belarus | BY | 0 |
| Bosnia and Herzegovina | BA | 0 |
| Bulgaria | BG | 0 |
| Croatia | HR | 0 |
| Czech Republic | CZ | 0 |
| Faroe Islands | FO | 0 |
| Gibraltar | GI | 0 |
| Greece | GR | 0 |
| Guernsey | GG | 0 |
| Holy See (Vatican City State) | VA | 0 |
| Hungary | HU | 0 |
| Isle of Man | IM | 0 |
| Italy | IT | 0 |
| Jersey | JE | 0 |
| Latvia | LV | 0 |
| Liechtenstein | LI | 0 |
| Lithuania | LT | 0 |
| Macedonia, the Former Yugoslav Republic of | MK | 0 |
| Malta | MT | 0 |
| Moldova, Republic of | MD | 0 |
| Monaco | MC | 0 |
| Montenegro | ME | 0 |
| Romania | RO | 0 |
| Russian Federation | RU | 0 |
| San Marino | SM | 0 |
| Serbia | RS | 0 |
| Svalbard and Jan Mayen | SJ | 0 |
| Ukraine | UA | 0 |

 

First big surprise is that Germany has 10x the number of resources of all the other countries put together! It turns out that this is largely due to a single data provider ([Pangaea.de](http://www.pangaea.de/)) who publish a very large number of small data sets, many form individuals or small projects. These should shake out later in the analysis. The distribution of sources by countries isn't too surprising. Larger, richer countries have more. But why none in Italy and only one in Sweden?

## Teasing Out the Specimens

The data harvested was for all data sets but many of these are observational data and not museum and herbarium catalogues. Fortunately there is a field in the metadata that gives the default basis of record. It may be that some are mixed but in practice this is unlikely. Unfortunately this field isn't always filled in.

| **Basis Of Record** | **Count** |
| :-- | --: |
| observation | 6718 |
| unknown | 2821 |
| specimen | 101 |
| living | 3 |

It looks as though we only have 101 data sets for collections but some of those 2,821 must be collections. Can we guess which ones on some other characteristics of the data set.

- Firstly we are only interested in larger data sets - the bigger collections first strategy - so we could forget everything with less than 1,000 occurrence records. This should also clear out many of the personal data sets in Pangaea.de.
- Then we might presume that observation data sets will have more observations per taxon than specimen data sets. Instead of collecting representatives of species they are collecting distribution or ecological data.
- Then we might presume that specimen data is old and probably won't yet be geocoded where as for observation data location is everything and they will frequently be geocoded.

Here is a query ignoring collections with < 1,000 occurrence records and showing the occurrences/taxon and percentage geocodings.

| **Basis of Record** | **\# Data Sets** | **Occurrences/Taxon** | **% Geocoded** |
| :-- | --: | --: | --: |
| living | 3 | 2 | 0 |
| observation | 624 | 240 | 99 |
| specimen | 90 | 13 | 45 |
| unknown | 774 | 584 | 75 |

It looks to me that we could make the presumption that if an unknown data set has an average of fewer than 50 occurrences per taxon and is less than 50% geocoded then it is probably a specimen dataset. In SQL we consider a data set to be a specimen collection  WHERE basisOfRecord = 'specimen' OR (basisOfRecord = 'unknown' AND occurrenceCount > 1000 and occurrencesPerTaxon < 50 and percentGeocoded < 50).

Doing this gives us a list of  **276 data sets** and a total number of specimens of **7,665,815**.

In my [previous blog post](http://www.hyam.net/blog/archives/1235) I did not attempt to estimated the number of specimens in Europe but I did total the number mentioned in the Biodiversity Collections Index as 334 million. Working on the basis that many collections are missing from that list but that the missing collections are unlikely to be the BIG collections it seems reasonable to assume the total number of specimens in Europe will not top 500 million. If you doubt this then think where we might find another 160 collections containing a million specimens each. Arturo Ariño wrote a paper in 2010 ([Biodiversity Informatics, 7 2010, pp. 81-92](https://journals.ku.edu/index.php/jbi/article/view/3991)) where he estimated total units (specimens/lots/countable things) to be 1.2 to 2.1 billion and that GBIF had mobilized only 3% of these. My personal feeling is that these are over estimates but not by orders of magnitude.

If there are 334 million specimens in Europe then 7.7 million records in GBIF is 2.3% on the other hand if we underestimate collections and there are 0.5 billion specimens in Europe then GBIF only has 1.5% of them. **Whichever you choose it is not a lot**.

If we were to take just six big collections - for example:

- Muséum National d'Histoire Naturelle - Entomology
- Royal Belgian Institute of Natural Sciences
- Natural History Museum London, Department of Entomology
- Royal Museum for Central Africa
- Naturhistorisches Museum Wien
- Natural History Museum of Denmark

And then we were to digitize just 5% of their holdings. We would more than double the number of European specimens in GBIF.

What am I missing?
