---
title: "A Case for LSIDs and RDF in Biodiversity Informatics"
date: 2006-07-10
categories: 
  - "biodiv"
---

## What's the Problem?

Imagine you are a biologist looking at a group of organisms. You may be interested in these organisms because they occupy similar ecological niches or the same geographical region or for any other number of reasons. In order to study these organisms you need to gather data from different sources. As you gather data you learn more and your requirements change. You may start by requiring taxonomic and distribution data but move on to needing molecular and descriptive information. At the same time you will produce data of your own that you want to share with your collegues and the wider community. Scientific etiquette dictates that you must credit your sources and you want to make it easy for people to validate your work by reproducing it - so fine grained provenance information is important.

To summarise, biologists are interested in combining heterogeneous data from distributed data sources, adding value to that data, and then publishing it back to the community. Neither the form nor the location of the data is known at the outset. The provenance of data must be maintained throughout.

How would you do this today? You may go to a data aggregators like GBIF, Orbis and Species2000 for your occurence and taxonomic data. If you want to store this on your laptop you would probably build your own database in Microsoft Access or Excel and cut and paste data into it. You might be technical enough to write your own import routines to consume data from Species2000/SPICE, DiGIR/DarwinCore and BioCASe/ABCD providers and map them into you own, internal data model. By the time you have incorporated molecular data from Genbank and phylogenetic trees in NEXUS format you will probably have spent far more time writing software than examining the original biological problem.

## Why XML Schema is NOT the answer.

The use case requires that a biologist consume data and map it to an internal data model. What form should this internal model take? The biologist/programmer could adopt one of the existing XML Schema based standards, such as ABCD, and create a version of that in Access or even in a native XML database. They could then map data that they come across in other formats into this model - extending it for the data types that aren't already covered. The result is that they have a unique data model (only they have come across their combination of different data types and adopted them in their particular way). The fact that all the data they have come across has been in XML Schema controlled documents has been of only minor use. It may have enabled them to automatically validate the data they recieve. It may even have helped them generate Java or C# code that represents the data in memory but it has not helped them store it or link it to the data they already have.

Combining data in multiple, unpredictable XML formats is not just "non-trivial" it is almost impossible. The only projects that are attempting to consume data from multiple XML based source in the biodiversity informatics community are portal projects with dedicated programmers. Nobody (to my knowledge) is attempting to write clientside code that does this.

From the data publishers point of view it is confusing as well. Each XML Schema is effectively a syntax definition for a new language that must be understood and mapped to their internal structures.

XML Schema is a syntax definition language. For two people to understand each other they must share both syntax and semantics.

## What would an answer to the problem look like?

There are three things that would help a great deal:

- Globally Unique Identifiers (GUIDs) for the data objects so that when two pieces of data from different places are about the same object ( e.g. a ppecimen record) we can join them together automatically.
- GUIDs for the concepts of things so that when two pieces of data are of the same kind (e.g. the collection number field of the specimen record) we can treat them the same.
- A single transport model so that we can digest all this data with the same code.

How would we solve this in an ideal world?

What if all the data sources that a biologist wanted to use were endcoded in RDF with GUIDs for objects and concepts (ignoring the more naturally binary data like images for the moment)? We would still need to visit an aggregator or indexer to find where the data was but it would be easy to expand on the answers the aggregator gave us because the data would be tagged with GUIDs. We would be able to go back to the original source and get the full version of an object and we would be able to follow links between objects like following links on the web. If we used a triple store to hold the data on our laptop then we would know that any data we retrieved from any data supplier could be stored in it - because they would all follow the same model. As we added data to the store it would be linked together automatically because the concepts and the objects used would be linked by their GUIDs. We could query our combined data either by writing [SPARQL](http://en.wikipedia.org/wiki/SPARQL) queries or by using graphical tools that did it for us.

## But Triple Stores don't Scale - I don't want to put all my data in a triple store!

Note that the vision above does not included the data suppliers having their data in triple stores. It only assumes that their responses are given in RDF. Neither does it assume that the suppliers are particularly RDF aware - they could simply serve XML data that happens to be compliant RDF - perhaps from a simple file on a webserver. The important thing is that the data that is shared is mapped into a "triple shaped world".

## What about the binary stuff?

This system does not handle binary data but it helps find and curate the binary data and feed it into the correct programs to handle it.

## RDF - a Saviour?

The Biodiversity Informatics use case is not unique. The same use case applies to anyone doing research in a complex domain: historians, geologist, lawers etc. Imagine a travel agent researching a trip for a party of school children. They would need to go through more or less the same process of gathering heterogenious data from multiple sources, combining and analysing it. This is the challenge that faces the web as a whole and is being addressed by the [Semantic Web](http://www.w3.org/2001/sw/) project. It is not an easy problem to solve and is unlikely to solved within any one domain. Indeed, as the problem concerns integrating data across domains, it has to be solved by cross domain collaboration like the W3C effort.
