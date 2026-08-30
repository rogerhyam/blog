---
title: "UUIDs may be Dangerous"
date: 2008-11-17
categories: 
  - "biodiv"
tags: 
  - "uuid-lsid-doi-guid"
---

There is no doubt that Globally Unique Identifiers (GUIDs) are important and not just because I have been [hammering on about them](http://www.tdwg.org/fileadmin/2008conference/slides/Hyam_01_03_Architecture.swf) for the last few years. It is hard to imagine a world where biodiversity data can flow from one application to another without some kind of tagging of that data to show its provenance. The question we can't get beyond is **how** to tag the data.

TDWG recommends the use of [LSID](http://en.wikipedia.org/wiki/Lsid)s -which are pretty restricted to the life science community (the clue is in the name). Publishers see books, journals and papers as "assets" and therefore legitimately use [DOI](http://en.wikipedia.org/wiki/Digital_object_identifier)s. Neither of these technologies play nicely with Semantic Web technologies _al la_ W3C and so some people prefer [PURLs](http://en.wikipedia.org/wiki/PURL) or even Plain Old URL.

All these types of GUID are resolvable. Each can act as a form of address (by a variety of mechanisms). An implication of this is that each must be associated with some form of issuing/resolving authority. If you or your PC comes across one of these things it can look it up and get an authoritative answer as to what data it represents and who "owns" or curates that data.

Running some form of authority implies having access to some technical resources such as a web server and possibly DNS server. In the case of DOIs it implies paying some one else to run the infrastructure for you. This is not easy for many data suppliers.

[UUID](http://en.wikipedia.org/wiki/UUID)s to the rescue! UUIDs are great. Just get the computer to make up a string of random digits that is complex enough to be guaranteed globally unique. Anyone should be able to tag anything with a GUID. This solves the multiple routes problem. If a consumer receives two pieces of data that bear the same UUID then they can assume that the two pieces of data are actually the same thing and one can be ignored.

But what happens if the two pieces of data tagged with the same UUID differ? Perhaps one has an extra field or two. How do we know which is correct? Perhaps one was originally created as the result of a search and the other was harvested as an RSS feed and the two mechanisms give different versions or views of the object identified by the UUID. Or perhaps one has been changed by some intermediary. How does the consumer of the information resolve the situation?

One way would be to approach an indexing service that has recorded the occurrence of all the UUIDs. Google's pretty good at this kind of thing but it would not be possible to differentiate on Google between pages that mention the UUID and those that contain the authoritative data associated with the UUID. To do this we would need a real register that maps UUID to data source. At this point we are close to recreating the Handle system that drives DOIs and the advantages of UUIDs are slipping away. You can't just use UUIDs you must use registered UUIDs!

It gets worse. Suppose I have created the preferred description of a taxon. I tag it with a UUID to uniquely identify it. Other people refer to it using the UUID. All is well in the world until an awkward person disagrees with me. Perhaps I haven't added new data to my description or corrected errors. So the awkward person puts up their own description of the taxon and tags it with the **same** UUID - they redefine the meaning of that UUID by cutting and pasting it to a new authoritative description. They want to say "this is the correct description". Nobody owns the UUID so there is no arbiter. If their is a register of UUIDs then they could perhaps sort it out but they couldn't stop other people from setting up their own registers that favour different interpretations of particular UUIDs. This situation is very similar to the taxon name problem we have. No one owns a name so who has the definitive description of the taxon that name should be used for - nobody!

So UUIDs are dangerous. They appear to give a simple way to uniquely tag things but it is likely humans will mess this up. The fact that machines will not generate the same UUID twice is irrelivant if humans can cut and paste them with impunity.
