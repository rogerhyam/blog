---
title: "Synonyms Are SubClasses And Higher Taxa Are Just Tags"
date: 2009-10-26
categories: 
  - "biodiv"
---

[![strict\_baptist\_chapel](images/strict_baptist_chapel-640x479.jpg "strict_baptist_chapel")](http://www.hyam.net/blog/wp-content/uploads/2009/10/strict_baptist_chapel.jpg)

I have been wrestling for some time with how to handle taxonomic hierarchies when combining multiple classifications. This is partly motivated by a pressure to produce consensus hierarchies for navigation (a task that I think is probably not worth doing but which is beyond the scope of this post) and partly from a need to carry out inference over multiple classifications using OWL (something that I think is an important research topic if we are to overcome the 'taxonomic impediment').

Take the simplest scenario where we have classification C1 that contains family Z with two genera X and Y that contain a total of three species Xa, Xb and Yc. Now let there be another classification C2 that is identical but for the species Xb being moved to the genus Y as Yb.<!--more-->

### Classification C1

- Family Z
    - Genus X
        - Species Xa
        - Species Xb
    - Genus Y
        - Species Yc

### Classification C2

- Family Z
    - Genus X
        - Species Xa
    - Genus Y
        - Species Yc
        - Species Yb
            - syn: Xb

It doesn't matter here whether C1 comes before or after C2 historically or whether one is preferred by the current expert over the other. The mere fact that both these classifications exist and that they **may** have been used to score data in different studies is enough for us, in the biodiversity community, to have to account for them.

## What is comparable between these two classifications?

If we can say that some of the taxa between these two classifications are equivalent then we can map them using the OWL equivalentClass or OWL sameAs assertions. Unfortunately because it isn't clear how higher taxa are defined it is not possible to put our finger on what has changed.

### Hypothesis 1: The Genera Are The Same

Genera are either circumscribed by (1) the list of species they contain (denoted membership) or (2) they are circumscribed by their written description (connoted or membership by extension) or they are circumscribed by a combination of the two (1&2).

If 1 (denotation) then the genera have to be different because they have different membership between classifications. If 2 (extension) then the genera have to have changed because the description of X sensu C1 included species Xb but genus X sensu C2 excludes it and the complementary argument for genus Y. If 1&2 then both the above arguments apply.

Therefore we must reject hypothesis 1 - the genera are not equivalents.

### Hypothesis 2: The Families Are The Same

Either families are circumscribed by 1 (denotation) or 2 (extension) or 1&2. Here the family contains genera of the same names in both classifications but we have just established that although these genera bear the same names they are in fact not equivalents. If we circumscribe families by denotation then Z is not equivalent between the two classifications because the genera are different.

Circumscribing families by extension is a little more tricky. In this very simplified example, if the family description in C1 contained the variation in X and Y it will still contain it in C2. We could merely have tweaked the genus descriptions by moving descriptors/characters from one genus to the other. Z sensu C1 and Z sensu C2 have the same membership in terms of species (though this is uncertain because we haven't established that the species are the same). In real life it is unlikely that families in one classification will recognize exactly the same genera as in other classifications and so the same argument as was used in hypothesis 1 would apply.

Therefore we must substantively reject hypothesis 2 - the families probably are different although there are cases where they may be considered the same.

### Hypothesis 3: The Unmoved Species Are The Same

Species Xa and Yc have not moved and so we could assume they are the same but this involves a whopper of an assumption. **We must assume that a species description is free standing.** By free standing I mean it does not derive some of its descriptors/characters from the genus description. We have just established (I hope) that genera change. If the species descriptions are bound to the genera then we would have to assume the species change as well - unless we examine them on a case by case basis to see what has changed. In real life taxonomists do not always repeat all the characters of the genus in every species description although some do.

A safer bet would be to take a _sensu lato_ approach so Xa _sensu lato_ includes all interpretations of Xa (both _sensu_ C1 and _sensu_ C2). A specimen identified to Xa _sensu_ C1 can safely be assumed to belong to Xa _sensu lato_ and it may belong to Xa _sensu_ C2 but we can't assert that for definite.

Therefore we probably have to reject hypothesis 3 - the unmoved species may be the same but we can't guarantee it so should take a more cautious approach.

### Hypothesis 4: Synonymous Species Are The Same

Species Xb and Yb are the same species just moved between genera and so we can assume they are equivalent - but only if we make the same assumption we made for hypothesis 3.

Therefore we have to at least partially reject hypothesis 4 - synonymous species may be the same but only by making a huge assumption and it would be better to take a _sensu lato_ approach.

It appears there is no straight (i.e. equivalence) mapping that can be done between the two classifications.

## Disjoint Siblings

There is another powerful reason we can't join two classifications using equality relationships (i.e. owl:sameAs). In any single taxonomic classification a particular specimen should belong to only one taxon. All the taxa at each rank are disjoint from each other: meaning they don't overlap at all. Nothing can be a member of two taxa at the same rank at the same time.

If we import two contradictory classifications into the same ontology and we assert that all taxa that have the same names are equivalent then we will generate ambiguity errors - the resultant ontology will be logically inconsistent.

Take the current example. If we say that all taxa having the same names are equivalents including the species Xb and Yb (the binomial only changes because of the rule of nomenclature - most Zoologists would consider them to have the same name). Genera X and Y are disjoint (nothing can belong to both at the same time) but species b belongs to both genus X and Y - buzzzzz - logic error please disambiguate before continuing....

This says a lot about why taxonomy gets so confusing as soon as you try to step outside a single classification world view and, as we will always have to account for classifications changing through time (even if we were all working on a single consensus classification) we will always have to handle multiple classifications. An uncharitable interpretation is that the current (traditional) approach biological classification simply isn't fit for purpose any more.

## Synonymous Relationships

What we don't have in our example are any rejected names. Suppose a classification C3 where we sink Xb into Xa.

### Classification C3

- Family Z
    - Genus X
        - Species Xa
            - syn: Xb
            - syn: Xe
            - syn: Qf
    - Genus Y
        - Species Yc

What does this mean? How can we combine it with C1 and C2? In a strict nomenclature sense it means the types of Xa and Xb occur in the same species now and that Xa is the older name. The author of C3 clearly has a single vision for Xa/Xb and that Xb is some sub-part of it. That sub-part has to be the minimum of a single specimen (the holotype) or the maximum of the whole taxon (where the author effectively thinks Xa is a sub-part of Xb but Xa has the older name). As biodiversity infonauts we can't know the answer to this beyond knowing to treat Xb _sensu_ C3 as a subclass (or subset) of Xa _sensu_ C3.  The synonyms Xe and Qf can be treated similarly. In this way species synonyms form a layer in the taxonomy just as subspecies do but there is an important difference. Synonyms are not disjoint from each other. The same specimen can be a member of multiple synonyms at the same time. Remember that Xb, Xe and Qf also exist in other classifications where they are accepted taxa and that they are joined to these classifications in the same way we joined the species in the above example. Xb _sensu lato_ is equivalent to the union of Xb _sensu_ C1 and Xb _sensu_ C2.

We can treat all synonyms as subClasses as the arguments here apply equally then Xb sensu C2 is also a subClass of Yb sensu C2.

## Practical Strategy For Multiple Classifcations In OWL

Higher taxa don't seem to mean much (this will make some people's blood boil). It is therefore probably safest to simply treat all taxa above the level of species as 'tags' or simple classes that are not mutually disjoint. It is therefore safe to provide them all with owl:sameAs relationships to some common list of higher taxa. This means that all the subClassing assertions as genera move about between families in different classifications etc will just be additive and will allow discovery of species by any route that have been used. Species can happily belong to multiple genera and genera to multiple families upwards. This is similar to a SKOS type vocabulary or semantic network approach.

At species level and below we define _sensu lato_ taxa for each **name** and these taxa are defined as the union of all the taxa (including when they occur as synonyms) for that name.

Species are disjoint from each other within any one classification.

Species and below synonyms are subclasses of accepted taxa but are not disjoint from their siblings.

A more radical, and simpler, approach would be to abandon the notion of disjoint sibling classes and simply say that everything that has the same name (including homotypic binomial taxa as having the same name) is the same (owl:sameAs) but continue to treat all synonyms as subclasses of accepted taxa. This would be throwing away information that we do have (disjointedness and the notion of a _sensu lato_ taxon as used here) but may produce a more understandable ontology.

Either of these approaches should produce a logically consistent ontology (containing an arbitrary number of possibly contradictory classifications) that can be reasoned over in finite time using a OWL DL inference engine and could act as the basis for a global biological classification registry. Indeed such a registry could possibly support multiple methods of binding different classifications.

Whether inference across such ontologies could produce anything worthwhile is another matter entirely and something that needs researching.
