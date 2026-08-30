---
title: "Herbarium Digitisation: Is 600dpi Evil?"
date: 2008-11-30
categories: 
  - "biodiv"
---

I have been doing some thinking about capturing images of herbarium specimens so as to facilitate the "taxonomic process" - whatever that might be. The trigger for writing this down was a quote from an excellent series of papers on digitisation of specimens:

> “Plant sheets are usually scanned at somewhere around 1000 DPI (600 DPI being now generally considered the absolute minimum requirement), which renders images in the hundred-megabyte range.” Ariño and Galicia (2005) in [Christoph L. Häuser, Axel Steiner, Joachim Holstein & Malcolm J. Scoble. (eds) (2005) Digital Imaging of Biological Type Specimens: A Manual of Best Practice. ENBI, Stuttgart](http://http://circa.gbif.net/Public/irc/enbi/comm/library?l=/enbi_reports/biological_specimens)

If you take a picture of a herbarium specimen with a modern (10 to 20 megapixel) digital SLR you will get an image that is around 300 dots per inch (dpi) measured on the specimen. This is relatively cheap and easy to do. To capture images above this resolution requires very expensive cameras or flat bed scanners suspended upside down on special rigs or something equally complex. More importantly capturing images above this stepping point in resolution slows down the capture process enormously - so that fewer specimens are imaged.  This simple requirement of 600+ dpi is actually a hurdle to the digitisation of herbaria so there must be a good reason for it. I am not so sure that there is and here I explain why.

## What Botanists Actually Do

Take a look at a botanist working in a herbarium. Their work can be broken down into six phases. What resolution images would it take to carry out these stages in a virtual way with all the advantages of digital specimens?

1. **Discovery** Find that the specimens exist and where they are located. This is largely text based. It requires the filing name and geographic origin data to be captured in the herbarium catalogue. Text capture is a side effect of imaging the specimen with its own inherent problems but does not require images above 300dpi.
2. **Retrieval** Gain physical access to the specimens by removing folders from cabinets and placing them on a work bench or requesting a loan from a separate herbarium. This is easier with lower resolution images but can be achieved with any resolution image. Just about any resolution above 100dpi will require some form of zooming/thumb-nailing of images for manipulation in an interface so 300 dpi would be fine 600+ requires more resources but is equally OK.
3. **Selection** Each specimen is looked at it turn. This is typically little more than a glance at a distance of approximately twice normal reading distance (>700mm). The botanist is getting the gist of the specimen. Some specimens are selected to be examined. The selection criteria may be based on label information or whether the specimen appears to contain suitable material e.g. whether it is fruiting or flowering.
4. **Examination** If a specimen is selected in step three then it is examined in more detail. It may be picked up and held closer to the face at about a reading distance of 350mm. Measurements down to 0.5mm may be taken using a rule.
5. **Detailed Examination** The botanist may use a hand lens or long arm binocular microscope to examine parts of the specimen at 10x to 60x magnification. Depending on the taxonomic group this stage may come very quickly after stage 4.
6. **Further Study** The capsule may be opened and contents examined. Parts of the specimen may be removed, boiled, dissected and returned to the capsule. No resolution of image will permit this activity!

Of these six stages the resolution is only pertinent to phases 3, 4 and 5 - so what resolution is require for these stages?

## Visual Acuity and DPI

[![](images/what_res_pic.png "Angle subtended at eye")](http://www.hyam.net/blog/wp-content/uploads/2008/11/what_res_pic.png)

Visual acuity is the ability to see clearly. ([Here](http://en.wikipedia.org/wiki/Visual_acuity) is the Wikipedia page to save you searching for it). Some one with good normal vision (20/20) can distinguish two lines when the angle of view subtended at the eye is 1 arc minute (1/60th of a degree or 0.016667 degrees). This is under ideal, high contrast conditions where the lines are vertical or horizontal. Under other conditions discrimination will be worse. The nearer they are to the subject (down to the minimum distance they can focus) the smaller the things they can see - somewhat obvious - but here we have a rule of thumb for what normal people can distinguish and we can use good old high school trigonometry to calculate what they should be able to see at different viewing distances.  How does this relate to dpi?

When a digital imaging device is capturing the real world you can think of it as sampling a surface at regular intervals - like placing a piece of graph paper over the subject and recording the colour under each square. A higher resolution is a finer gridded graph paper. You may be tempted to think we can estimate the size of grid squares on the basis of the angle subtended and we can but a fudge factor is needed. Because the camera is **sampling** reality there is built in error connected to the sampling rate. The grid may not line up with points that exist in reality so a tiny dark spot may be on the boundary between two grid squared and neither of them pick it up faithfully. I am going to call this the Nyquist fudge factor (NFF). It is correctly related to the [Nyquist Rate](http://en.wikipedia.org/wiki/Nyquist_rate) but the math is beyond this blog. Basically to avoid the anti aliasing errors you have to more or less double the sampling frequency (NFF of x2).

Armed with these two pieces of information, the 1 arc minute angle subtended and the NFF of x2, we can work out what resolution images we need to meet the requirements of the botanist in phases 3, 4 and 5.

At normal reading distance (as used in phase 4) visual acuity is around 0.1mm which implies dots need to be twice as frequent (NFF) to capture this level of detail - each dot or grid square should be 0.05mm across. Converting this to inches we get 500 dpi. This figure should guarantee to capture two line 100microns apart. We can double these measurements at the 700mm viewing distance suggested for phase 3 equating to 250 dpi.

What about at phase 5, where the botanist takes out a hand lens or binocular microscope? The most common magnification for a hand lens is 10x. No lens is perfect but this would imply resolutions in the region of 5000dpi. To reproduce the effect of a good quality binocular microscope is going to require capturing specimens at around the 10,000 dpi mark which is technically totally impractical and even if it was may not be desirable.

There is a big jump here. 250dpi -> 500dpi -> 10,000 dpi. **Conventional photographic capture techniques can only hope to simulate a limited range of what a botanist does with a specimen.** They can't get anywhere near simulating the use of optics so we shouldn't bother trying to do that.

## Sanity Check

If you are reading this at a PC or Mac you probably can't see the dots that make up the screen image. If you measure from your eye ball to the screen you will find it is in the region of 700mm away.  In computer displays common dot pitches are 0.31mm to 0.25mm. My lovely iMac screen (no bias there) has a dot pitch of around 0.254. If I go down to my close focus distance of about 150mm I can just see the dots. The dot pitch of screens is a difficult measure because they have three sub-dots making up each colour dot. The dots may be arranged in different patterns but it is a worthy comparison for our purposes. Try this on your monitor with your own eyes. What dots can you see? The size of dots on your screen will be at least 250% bigger than the dots we are hypothesising capturing on specimens at 500dpi. i.e. imagine seeing something half to a third the size of the dot on your screen **with your naked eye**. Now imagine it is not brightly lit like a screen but part of a herbarium specimen.

You can cheat and use a hand lens to look at your screen if you like but remember you are then jumping to warp drive - and we are still only able to do impulse drive.

Looking at this sanely I can only conclude that 500dpi is the **maximum** needed to simulate phases 3 and 4 of a botanist's work and that phase 5 simply can't be done at the level of capturing the whole specimen. 300 dpi is probably plenty.

## Conclusions

This is just my opinion expressed to stimulated thought rather than as the basis for some ultimate standard approach but I hope that it illustrates a danger. 600dpi was the old rule-of-thumb-resolution for producing images for printed materials. It maps well to the 300 lines per inch (lpi) used in standard quality half tone screens for printed works (think of the Nyquist fudge factor now applied to the conversion from dots in the computer back to lines on a page) but has been brought forward into the purely digital age where the images are unlikely to be printed. This single figure of 600dpi has affected the whole culture of digitising herbarium specimens in large herbaria.

I have only discussed a tiny aspect of the digitisation chain. I've not mentioned the importance of focus, camera shake, noise, colour or compression of files. The interesting stuff really starts with the electronic workflow that could be handling the images coming out of these workstations in an entirely automated way. But that is another story...

(Thanks to Bob Morris for some comments on this)
