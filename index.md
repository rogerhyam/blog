---
title: "Gallery Page"
styleClass: indexPage
layout: gallery.html
---


<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container" id="home">
    <div class="w3-display-middle w3-center w3-black w3-xlarge w3-padding-large w3-opacity" style="white-space:nowrap;">
        <span class="w3-wide">ROGER HYAM</span>
    </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">ABOUT</h3>
    <div class="w3-row-padding">
        <div class="w3-quarter w3-center">
            <p style="margin-top: 20px;">
                <img src="style/portrait.jpg" class="w3-round w3-image w3-grayscale-max" alt="Photo of Me" width="400"
                    height="333">
            </p>
        </div>
        <div class="w3-threequarter">
            <p>
                I photograph the forces that shape the Scottish Landscape.
                These include us &mdash; not just those of us in historical memory but our
                land ancestors stretching back to the retreat of the ice sheets some ten thousand years ago.
                I hope to show the land as us rather than something other, that we merely have a relationship to.
            </p>
            <p>
                I enjoy creating film negatives as tangible artifacts.
                From these negatives I make both modern, pigment and traditional, darkroom prints.
                The logistical challenges of using a large format camera force me to engage with the world
                in a way I might otherwise avoid.
                Working only in black and white helps me concentrate on form and meaning.
            </p>
            <p>
                I seek to create a personal response to a place rather than a pleasing facsimile.
                Every moment contains beauty if we look deeply enough but few can yield photographs
                that convey how it touches us.
            </p>
            <p>
                My physical and emotional state inter-are with the materials I use, the scenes I photograph and the
                viewers of finished works.
                I therefore try to follow the Buddhist principles of Right Speech.
                My photographs should be timely, true, affectionate, helpful and come from an open heart.
                Often I am not in the right place physically, emotionally or spiritually and so leave my camera behind
                and simply enjoy looking.
            </p>
            <p>
                I hope my work provokes a deeper examination of who we are through the landscapes we create.
            </p>
        </div>
    </div>
</div>


<!-- Second Parallax Image with PHOTOGRAPHS Text -->
<div class="bgimg-3 w3-display-container w3-opacity">
    <div class="w3-display-middle w3-center w3-black w3-xlarge w3-padding-large w3-opacity">
        <span class="w3-xxlarge w3-text-white w3-wide">MY WORK</span>
    </div>
</div>

<!-- Container (photographs Section) -->
<div class="w3-content w3-container w3-padding-64" id="photographs">
    <h3 class="w3-center">PHOTOGRAPHS</h3>
    <p class="w3-center" style="padding-left: 15%; padding-right: 15%;">
        My work is organised into thematic projects. Some are finite, some infinite.
        Projects emerge from photographs taken outside of specific themes.</p>
    <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
    <div class="w3-row-padding w3-center">

        {% for post in collections.project %}
            <div class="w3-third">
                <a href="{{post.url}}">
                    <img src="{{ post.data.cover }}" style="width:100%; max-height: 90vh;"
                        onclick="onClick(this)" class="w3-hover-opacity" alt="{{post.data.title}}">
                    {{post.data.title}}
                </a>
            </div>
        {% endfor %}

<!--
        <div class="w3-third">
            <a href="strathglass.php">
                <img src="projects/strathglass/strathglass-1.jpg" style="width:100%; max-height: 90vh;"
                    onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
                Strathglass
            </a>
        </div>
        <div class="w3-third">
            <a href="emergent.php">
                <img src="projects/emergent/pentlands-1.jpg" style="width:100%; max-height: 90vh;"
                    onclick="onClick(this)" class="w3-hover-opacity" alt="Emergent">
                Emergent
            </a>
        </div>
-->
    </div>

</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i
            class="fa fa-remove"></i></span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption" class="w3-opacity w3-large"></p>
    </div>
</div>

<!-- Second Parallax Image with dedication Text -->
<div class="bgimg-2 w3-display-container ">
    <div class="w3-display-middle w3-center w3-black w3-xlarge w3-padding-large w3-opacity">
        <span class="w3-xxlarge w3-text-white w3-wide">TOUCHING THE EARTH</span>
    </div>
</div>

<!-- Container (Touching the Earth Section) -->
<div class="w3-content w3-container w3-padding-64" id="dedication">
    <h3 class="w3-center">DEDICATION</h3>
    <div class="w3-row-padding">
        <div class="w3-panel w3-light-grey w3-italic">
            <p>
                In gratitude, I bow to this land and all the ancestors who made it available.
            </p>
            <p>
                I see that I am whole, protected and nourished by this land and all of the
                living beings who have been here and made life easy and possible for me
                through all their efforts.
            <p>
                I see the hard-working farmers and fishermen,
                miners, labourers and shipbuilders, and I see the women – the crofters
                who held the hearths, the fisher quines who followed the boats, the
                women waulkers who wove the cloth and the culture of the people into
                song, the wise women and healers.
            </p>
            <p>I see the close family bonds of the
                clans, and the traveller folk, the 'summer walkers' who lived close to the
                earth and followed the rhythms of the seasons.
            </p>
            <p> I see Maire Mhor nan
                Oran (Big Mary of the songs), Robert Burns, George Mackay Brown, and
                all the poets, artists and musicians who have contributed to the rich
                heritage of this country. I see James Keir Hardie, Ramsay MacDonald
                and John Smith - champions of social justice; I see Alexander Fleming
                and Joseph Lister, whose discoveries of penicillin and antiseptics
                continue to save so many lives; I see Andrew Carnegie, who used his
                great wealth to promote learning, literacy and peace; and Queen
                Margaret, who ruled with such compassion that she was made a saint.
            </p>
            <p>
                I
                see the conservationist John Muir, considered to be the father of the
                environmental movement. I feel the power of the sacred places in this
                land – the standing stones of our earliest ancestors; Holy Island, now a
                centre for world peace; Iona, home to early Celtic Christianity; Findhorn,
                beacon of light.
            </p>
            <p>
                I feel the energy of this land penetrating my body and
                soul, supporting and accepting me. I vow to cultivate and maintain this
                energy and transmit it to future generations. I vow to contribute my part
                in transforming the violence, hatred, and delusion that also still lie deep
                in the collective consciousness of this society so that future generations
                will have more safety, joy and peace.
            </p>
            <p>
                I ask this land for its protection and
                support.
            </p>
        </div>
        <p>
            This text is the third of <a href="https://plumvillage.org/key-practice-texts/the-five-earth-touchings">Five
                Earth Touchings</a>
            used in Scotland by the <a href="https://plumvillage.org/">Plum Village</a> Zen tradition.
            Earth Touching is the spiritual practice of contemplating what has been transmitted to us by
            our ancestors.
        </p>
    </div>
</div>


<!-- Third Parallax Image with photographs Text -->
<div class="bgimg-4 w3-display-container w3-opacity-min">
    <div class="w3-display-middle w3-center w3-black w3-xlarge w3-padding-large w3-opacity">
        <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
    </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64 w3-center w3-large" id="contact">
    <h2><i class="fa fa-map-marker w3-margin-right"></i>Edinburgh, Scotland</h2>
    <div class="">
        <i class="fa fa-envelope fa-fw w3-xlarge w3-margin-right"></i>Email:
        <a href="mailto:roger@hyam.net?subject=Website enquiry">roger@hyam.net</a><br>
        <i class="fa fa-file-text fa-fw w3-xlarge w3-margin-right"></i>Blog: 
        <a href="/posts/">20+ year of posts</a><br>
        <i class="fa fa-youtube fa-fw  w3-xlarge w3-margin-right"></i>YouTube: <a
            href="https://www.youtube.com/@RogerHyam">@RogerHyam</a><br>
        <i class="fa fa-instagram fa-fw  w3-xlarge w3-margin-right"></i> Instagram: <a
            href="https://www.instagram.com/rogerhyam/">
            @rogerhyam</a>
    </div>

</div>
</div>