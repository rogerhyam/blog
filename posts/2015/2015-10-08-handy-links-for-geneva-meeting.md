---
title: "Handy Links for Geneva Meeting"
date: 2015-10-08
categories: 
  - "biodiv"
coverImage: "20151106-Westonbirt.jpg"
---

These are just some handy links for me to present at a CETAF Information Science and Technology Committee meeting in Geneva, October 2015.

## What RBGE publishes

- Example Edinburgh URI: [http://data.rbge.org.uk/herb/E00393164](http://data.rbge.org.uk/herb/E00393164)
- Leads to 303 redirect with content negotiation:
    - Humans get: [Catalogue Page](http://elmer.rbge.org.uk/bgbase/vherb/bgbasevherb.php?cfg=bgbase/vherb/fulldetails.cfg&specimens_specimen__num=431984)
    - Machines get: [RDF page](http://data.rbge.org.uk/service/rdf/herb.php?guid=http://data.rbge.org.uk/herb/E00393164)
- Our RDF also contains a [link to an image resource](http://data.rbge.org.uk/images/333017) which we overload for [bigger image](http://data.rbge.org.uk/images/333017/-1).

## Main Use Case

- [The Wallich Catalogue](http://wallich.rbge.info/) home page. _A numerical list of dried specimens of plants in the East India Company's Museum_
- [Example Entry 2574](http://wallich.rbge.info/node/13050). Shows links to specimens from three different herbaria.
- How do we make these "pretty" i.e. more useful?
- We only want to store specimen IDs on the Wallich server (though may cache a little)

## Radical Suggestion

I always come up with something that is overly simplistic so here it is:

- Most important thing is ubiquity. It is no good coming up with a specification for minimal data if 4 out of 10 providers implement it. We need 10/10 for it to be worthwhile.
- Things that server two purposes are more likely to thrive.
- FaceBook have a meta [tagging standard based on open graph](https://developers.facebook.com/docs/sharing/webmasters#markup) that they use to provide rich links to web pages and other resource.
- [Here is an example of my implementation on another project](http://tenbreaths.rbge.info/survey-82c8dfaf-a995-4a58-8a16-1778a4374655). Took twenty minutes to add to the page.
- The Facebook approach meets my main use case. It could be done along with any other stuff with RDF. i.e. Every collection needs the URIs to redirect to human readable page and this is trivial to add to that page.

## Second Use Case

- This is a bit vague and others may know more.
- Afghan Specimens Portal
- [Centre for Middle Eastern Plants](http://www.cmep.org.uk/)
- Dagmar Triebel  @ Botanische Staatssammlung München
- & others
- Could it be implemented as "just" a list of specimen IDs?
