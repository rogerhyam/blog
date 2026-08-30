---
title: "SpeciesIndex: A waste of midnight oil?"
date: 2009-02-22
categories: 
  - "biodiv"
---

[![unicorn](images/unicorn.jpg "unicorn")](http://www.hyam.net/blog/wp-content/uploads/2009/05/unicorn.jpg)

Back last year at [TDWG2008 in Fremantle![](images/t.gif)](http://www.tdwg.org/conference2008/) there was a Wild Ideas session where people could propose crazy things that might not be serious or urgent. I gave a [presentation![](images/t.gif)](http://www.tdwg.org/fileadmin/2008conference/slides/Hyam_20_04_SpeciesIndex.swf) called _[SpeciesIndex?: A practical alternative to fantasy mashups![](images/t.gif)](http://www.tdwg.org/proceedings/article/view/338)_. This was meant to be a bit of fun but actually went down quiet well with a few people coming up to me afterward who were interest in it. A wiki page called [SpeciesPages![](images/t.gif)](http://wiki.tdwg.org/twiki/bin/view/TAG/SpeciesPages) was created to flesh out the ideas.

The ideas presented in the paper to the conference and on the wiki are that each publisher of species pages. (i.e. anyone with a web site that has a page per species approach to taxonomy) should produce a [SiteMap](http://www.sitemaps.org) file that contains a list of just those pages and submits the location of the SiteMap to a register so that the pages could be indexed and other services built around them.

Over the intervening months I got to thinking about the idea some more  and playing around in the evenings with some code.<!--more-->

A couple of weeks ago I wrote to [Taxacom](http://mailman.nhm.ku.edu/mailman/listinfo/taxacom) asking for suggestions of sites containing species pages that I could look at and triggered a [very long thread](http://markmail.org/thread/zgjyq4ajj4t7c3vr) that, in characteristic Taxacom style, drifted way, way off  topic.

This weekend the idea passes a watershed. I have spent far too much time on it. Time I should spend sleeping or with my family. I have a full plate for the next month or so and will need my sleep so now is the time to push it out the door, take a look at it from a distance and possibly draw a line under the whole affair.

[SpeciesIndex.org](http://www.speciesindex.org/) is a very simple website with an index to just under 165,000 pages. Ninety thousand of these come from Wikipedia. This is a good source of seed data. The rest of the pages come from a [variety of sources](http://www.speciesindex.org/pages.jsp) with a bias towards botany (many thanks to the contributors). The index is a simple text index built on [Lucene.](http://lucene.apache.org/java/docs/) From my initial playing I have found Lucene a brilliant open source product - runs like stink with very low resource overhead.

I have injector code that takes a list of URLs (possibly in SiteMap XML) and stuffs them into a [MySQL](http://www.mysql.com/) database. Harvester code picks up the URLs from the db and, very slowly, calls the pages storing the resulting html text back in the db. An indexer can run across the entire dataset and create a Lucene index in about twenty five minutes. All this happens on my home desktop. The index is pushed up to a cheap virtual server with just [Tomcat](http://tomcat.apache.org/) running on it.

Of itself all this is a bit boring. Indexing web pages doesn't get us very far when we have people like Google doing it on a slightly larger scale. What **is** of interest is the limited scope of SpeciesIndex (you only get taxon descriptions back) and the fact that we can now start adding value to these pages because we know what they contain. This could act as the start of an iterative process where the index adds some value and suggests changes that could be made to pages that would enable it to leverage more value for everyone. Publishers are encouraged to go through a SpeciesIndex optimization process a little like commercial pages go through a search engine optimization process. We take a gradule "feel our way" approach which doesn't involve massive commitment of resources on untested technologies.

Next to each search result is a link to 'RDF'. For nearly all the pages this provides a piece of trivial RDF that asserts the existence of a [TaxonConcept](http://rs.tdwg.org/ontology/voc/TaxonConcept#TaxonConcept) that is described by the page found. In order to do this SpeciesIndex defines a URI for the TaxonConcept based on the speciesindex.org domain. This allows the RDF to function as per the [W3C recommendations](http://www.w3.org/TR/cooluris/). Requesting the TaxonConcept URI with a web browser you will be 303 redirected to the original species page. Requesting it with a machine (curl -L for example) takes you to the SpeciesIndex RDF. Here is an example: [http://speciesindex.org/taxon/207-551](http://speciesindex.org/taxon/207-551) will take you to either the [Wikipedia page for _Rhododendron luteum_](http://en.wikipedia.org/wiki/Rhododendron_luteum) or the [RDF for that page](http://www.speciesindex.org/rdf/207-551) from SpeciesIndex.

Again this is pretty trivial but it does provide and interesting framework. Effectively we are providing Globally Unique Identifiers for TaxonConcepts. Authors or publishers only have to put up a web page and tell us about it. We do the GUID stuff. This could be expanded to support LSIDs if SpeciesIndex was not just experimental.

In the example above part of the RDF looks like this:

```
<rdf:Description rdf:about="http://speciesindex.org/taxon/207-551">
    <tc:describedBy rdf:resource="http://en.wikipedia.org/wiki/Rhododendron_luteum"/>
    <tc:nameString>Rhododendron luteum</tc:nameString>
    <rdf:type rdf:resource="http://rs.tdwg.org/ontology/voc/TaxonConcept#TaxonConcept"/>
</rdf:Description>
```

All this says is that the concept is of type TaxonConcept, it has the name string 'Rhododendron luteum' and  it is described by the Wikipedia page. The content of the tc:nameString property has been pulled out of the known structure of the Wikipedia page. For non-Wikipedia pages the page title is used. SpeciesIndex has only done this because it didn't discover [RDFa](http://www.w3.org/TR/xhtml-rdfa-primer/) within the page.

Take a look at this mock up page for the [Mythical Unicorn](http://www.speciesindex.org/examples/unicorn.html). It demonstrates how pages could include some RDFa and then generate their own RDF via SpeciesIndex. When the indexer function runs on SpeciesIndex it does an RDFa extraction to generate the RDF for the entry. In just a few lines of code we have a powerful enabler for people to integrate their data.

The Mythical Unicorn has a very important 'hasName' property:

```
<tc:hasName rdf:resource="http://mythicalnomenclator.org/id/9876"/>
```

This links the TaxonConcept to a (currently mythical) nomenclator. If this one peice of information was provided for all the species pages we could hard link the pages into nomenclators such as [IPNI](http://www.ipni.org/), [Index Fungorum](http://www.indexfungorum.org) and [ZooBank](http://www.zoobank.org/) and automatically determine the correct citation for the name, link to objective/homotypic synonymy, the protolog, the type specimen and find other TaxonConcepts with the same name. We would start to build an integrated global taxonomy - just by adding a few extra lines of HTML to species pages that assert one relationship in RDF. We could do even more by using the [TaxonConcept Relationships](http://rs.tdwg.org/ontology/voc/TaxonConcept#Relationship)...

Enough already. The kids are watching back to back videos of the Simpsons and should be put to bed immediately. I'm still not certain this is the way forward but I do feel it has been a useful exercise. I would like to hear your thoughts.
