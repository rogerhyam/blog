---
title: "Vintage Lens Coverage Graphic"
abstract: "A nifty graphic to give a visual representation of what the different Schneider lenses will cover."
date: 2019-08-16
tags: ["featured"]
categories: 
  - "photography"
  - "schneider-lenses"
coverImage: "coverage_pic.jpg"
---

When you're shopping for a large format lens one of the first things you want to know is what the coverage is. Will it cover the format I'm working with and by how much? Having salvaged the [Schneider Kreuznach Vintage Lens Data](http://www.hyam.net/blog/archives/3961) I found myself with a piece of A4 paper and a compass trying to work out whether a particular lens will allow for movements on 4x5 or stretch to 5x7 etc. Getting frustrated I wrote the rough and ready Javascript+SVG application below to do this job automatically. Simply pick a lens from one of the drop downs and it will draw the image circle for you. Don't go spending money on the basis of this application alone. Check out the spec sheets and do some tests if you are serious. Your lens coverage may vary!

<script>

  document.write(`
<svg version="1.1" baseProfile="full" width="400" height="400" xmlns="http://www.w3.org/2000/svg">
	  <rect width="100%" height="100%" fill="white" stroke="black" stroke-width="2" id="background"></rect>  
	  <rect x="60" y="22" width="279 " height="356" fill="transparent" stroke="gray" stroke-width="2" id="sheet_11x14"></rect>
	  <text x="65" y="40" font-size="12" text-anchor="left" fill="blue">11&#215;14</text>
	  <rect x="98" y="73" width="203 " height="254" fill="transparent" stroke="gray" stroke-width="2" id="sheet_8x10"></rect>
	  <text x="103" y="91" font-size="12" text-anchor="left" fill="blue">8&#215;10</text>
  	<rect x="136" y="111" width="127 " height="178" fill="transparent" stroke="gray" stroke-width="2" id="sheet_5x7"></rect>
	  <text x="141" y="129" font-size="12" text-anchor="left" fill="blue">5&#215;7</text>	
	  <rect x="149" y="136" width="102 " height="127" fill="transparent" stroke="gray" stroke-width="2" id="sheet_4x5"></rect>
	  <text x="154" y="154" font-size="12" text-anchor="left" fill="blue">4&#215;5</text>
	  <rect id="text_background" style="display:none; opacity: 0.8" fill="white"></rect>
	  <text id="coverage_label" x="200" y="387" font-size="24" text-anchor="middle" alignment-baseline="bottom" fill="gray" style="display:none;">160</text>
	  <circle id="coverage1" cx="200" cy="200" r="80" fill="transparent" stroke="green" stroke-width="2" style="display:none;"></circle>
</svg>
  `);


  function updateCoverage(radius, label){
    if(radius == -1){
      coverage_label.style.display = 'none';
      coverage1.style.display = 'none';
      text_background.display = 'none';
    }else{
      coverage1.setAttribute('r', radius);
      coverage_label.innerHTML = label;
      coverage_label.style.display = 'block';
      coverage1.style.display = 'block';
      
      
      var padding = 4;
      var bbox = coverage_label.getBBox();
      text_background.setAttribute("x", bbox.x - padding);
      text_background.setAttribute("y", bbox.y - padding);
        text_background.setAttribute("width", bbox.width + (padding*2));
        text_background.setAttribute("height", bbox.height + (padding*2));
      text_background.style.display = 'block';
      
      
    }
  }
</script>
<p>
	By lens:
	<select id="by_lens" onchange="updateCoverage(this.value, this.options[this.selectedIndex].innerHTML); by_coverage.value = -1;" size="1">
      <option value="-1">~ Pick a lens ~</option>
      <option value="55">Angulon 6.8/65mm (109mm)</option>
      <option value="77">Angulon 6.8/90mm (154mm)</option>
      <option value="106">Angulon 6.8/120mm (211mm)</option>
      <option value="150">Angulon 6.8/165mm (300mm)</option>
      <option value="191">Angulon 6.8/210mm (382mm)</option>
      <option value="58">Super-Angulon 4/53mm (115mm)</option>
      <option value="62">Super-Angulon 5.6/47mm (123mm)</option>
      <option value="85">Super-Angulon 5.6/65mm (170mm)</option>
      <option value="99">Super-Angulon 5.6/75mm (198mm)</option>
      <option value="108">Super-Angulon 8/90mm (216mm)</option>
      <option value="144">Super-Angulon 8/120mm (288mm)</option>
      <option value="144">Super-Angulon 8/121mm (288.4mm)</option>
      <option value="197">Super-Angulon 8/165mm (394mm)</option>
      <option value="250">Super-Angulon 8/210mm (500mm)</option>
      <option value="55">Symmar 5.6/80mm (110.6mm)</option>
      <option value="72">Symmar 5.6/100mm (143.2mm)</option>
      <option value="95">Symmar 5.6/135mm (190mm)</option>
      <option value="105">Symmar 5.6/150mm (210mm)</option>
      <option value="128">Symmar 5.6/180mm (255mm)</option>
      <option value="149">Symmar 5.6/210mm (297mm)</option>
      <option value="168">Symmar 5.6/240mm (336mm)</option>
      <option value="201">Symmar 5.6/300mm (402mm)</option>
      <option value="250">Symmar 5.6/360mm (500mm)</option>
      <option value="72">Symmar-S 5.6/100mm (143mm)</option>
      <option value="87">Symmar-S 5.6/120mm (173mm)</option>
      <option value="95">Symmar-S 5.6/135mm (190mm)</option>
      <option value="105">Symmar-S 5.6/150mm (210mm)</option>
      <option value="126">Symmar-S 5.6/180mm (252mm)</option>
      <option value="147">Symmar-S 5.6/210mm (294mm)</option>
      <option value="169">Symmar-S 5.6/240mm (337mm)</option>
      <option value="206">Symmar-S 5.6/300mm (411mm)</option>
      <option value="246">Symmar-S 6.8/360mm (491mm)</option>
      <option value="250">Symmar-S 8.4/480mm (500mm)</option>
      <option value="250">Symmar-S 9.4/480mm (500mm)</option>
      <option value="55">Tele-Arton 4/180mm (110mm)</option>
      <option value="55">Tele-Arton 5.5/180mm (110mm)</option>
      <option value="76">Tele-Arton 5.5/240mm (152 or *130mm)</option>
      <option value="89">Tele-Arton 5.5/270mm (178mm)</option>
      <option value="132">Tele-Arton 5.5/360mm (264mm)</option>
      <option value="115">Tele-Xenar 5.5/360mm (230mm)</option>
      <option value="156">Tele-Xenar 5.5/500mm (312mm)</option>
      <option value="156">Tele-Xenar 8/1000mm (312mm)</option>
      <option value="156">Tele-Xenar 10/1000mm (312mm)</option>
      <option value="43">Xenar 3.5/75mm (85mm)</option>
      <option value="58">Xenar 3.5/100mm (116mm)</option>
      <option value="64">Xenar 4.5/105mm (127mm)</option>
      <option value="81">Xenar 4.5/135mm (161mm)</option>
      <option value="81">Xenar 4.7/135mm (161mm)</option>
      <option value="90">Xenar 4.5/150mm (180mm)</option>
      <option value="109">Xenar 4.5/180mm (217mm)</option>
      <option value="127">Xenar 4.5/210mm (253mm)</option>
      <option value="141">Xenar 4.5/240mm (282mm)</option>
      <option value="182">Xenar 4.5/300mm (364mm)</option>
      <option value="216">Xenar 4.5/360mm (432mm)</option>
      <option value="253">Xenar 4.5/420mm (506mm)</option>
      <option value="290">Xenar 4.5/480mm (580mm)</option>
      <option value="87">Xenar 5.6/150mm (173mm)</option>
      <option value="174">Xenar 5.6/300mm (347mm)</option>
      <option value="125">Xenar 6.1/210mm (249mm)</option>
      <option value="46">Xenotar 2.8/80mm (91mm)</option>
      <option value="59">Xenotar 2.8/100mm (117mm)</option>
      <option value="80">Xenotar 2.8/150mm (160mm)</option>
      <option value="43">Xenotar 3.5/75mm (85mm)</option>
      <option value="77">Xenotar 3.5/135mm (153mm)</option>
      <option value="55">Xenotar 4/100mm (110mm)</option>
	</select>
</p>
<p>
	By coverage:
	<select id="by_coverage" onchange="updateCoverage(this.value, this.options[this.selectedIndex].innerHTML); by_lens.value = -1;" size="1">
    <option value="-1">~ Pick a lens ~</option>
    <option value="43">Xenotar 3.5/75mm (85mm)</option>
    <option value="43">Xenar 3.5/75mm (85mm)</option>
    <option value="46">Xenotar 2.8/80mm (91mm)</option>
    <option value="55">Angulon 6.8/65mm (109mm)</option>
    <option value="55">Tele-Arton 4/180mm (110mm)</option>
    <option value="55">Tele-Arton 5.5/180mm (110mm)</option>
    <option value="55">Xenotar 4/100mm (110mm)</option>
    <option value="55">Symmar 5.6/80mm (110.6mm)</option>
    <option value="58">Super-Angulon 4/53mm (115mm)</option>
    <option value="58">Xenar 3.5/100mm (116mm)</option>
    <option value="59">Xenotar 2.8/100mm (117mm)</option>
    <option value="62">Super-Angulon 5.6/47mm (123mm)</option>
    <option value="64">Xenar 4.5/105mm (127mm)</option>
    <option value="72">Symmar-S 5.6/100mm (143mm)</option>
    <option value="72">Symmar 5.6/100mm (143.2mm)</option>
    <option value="76">Tele-Arton 5.5/240mm (152 or *130mm)</option>
    <option value="77">Xenotar 3.5/135mm (153mm)</option>
    <option value="77">Angulon 6.8/90mm (154mm)</option>
    <option value="80">Xenotar 2.8/150mm (160mm)</option>
    <option value="81">Xenar 4.7/135mm (161mm)</option>
    <option value="81">Xenar 4.5/135mm (161mm)</option>
    <option value="85">Super-Angulon 5.6/65mm (170mm)</option>
    <option value="87">Symmar-S 5.6/120mm (173mm)</option>
    <option value="87">Xenar 5.6/150mm (173mm)</option>
    <option value="89">Tele-Arton 5.5/270mm (178mm)</option>
    <option value="90">Xenar 4.5/150mm (180mm)</option>
    <option value="95">Symmar 5.6/135mm (190mm)</option>
    <option value="95">Symmar-S 5.6/135mm (190mm)</option>
    <option value="99">Super-Angulon 5.6/75mm (198mm)</option>
    <option value="105">Symmar-S 5.6/150mm (210mm)</option>
    <option value="105">Symmar 5.6/150mm (210mm)</option>
    <option value="106">Angulon 6.8/120mm (211mm)</option>
    <option value="108">Super-Angulon 8/90mm (216mm)</option>
    <option value="109">Xenar 4.5/180mm (217mm)</option>
    <option value="115">Tele-Xenar 5.5/360mm (230mm)</option>
    <option value="125">Xenar 6.1/210mm (249mm)</option>
    <option value="126">Symmar-S 5.6/180mm (252mm)</option>
    <option value="127">Xenar 4.5/210mm (253mm)</option>
    <option value="128">Symmar 5.6/180mm (255mm)</option>
    <option value="132">Tele-Arton 5.5/360mm (264mm)</option>
    <option value="141">Xenar 4.5/240mm (282mm)</option>
    <option value="144">Super-Angulon 8/120mm (288mm)</option>
    <option value="144">Super-Angulon 8/121mm (288.4mm)</option>
    <option value="147">Symmar-S 5.6/210mm (294mm)</option>
    <option value="149">Symmar 5.6/210mm (297mm)</option>
    <option value="150">Angulon 6.8/165mm (300mm)</option>
    <option value="156">Tele-Xenar 5.5/500mm (312mm)</option>
    <option value="156">Tele-Xenar 10/1000mm (312mm)</option>
    <option value="156">Tele-Xenar 8/1000mm (312mm)</option>
    <option value="168">Symmar 5.6/240mm (336mm)</option>
    <option value="169">Symmar-S 5.6/240mm (337mm)</option>
    <option value="174">Xenar 5.6/300mm (347mm)</option>
    <option value="182">Xenar 4.5/300mm (364mm)</option>
    <option value="191">Angulon 6.8/210mm (382mm)</option>
    <option value="197">Super-Angulon 8/165mm (394mm)</option>
    <option value="201">Symmar 5.6/300mm (402mm)</option>
    <option value="206">Symmar-S 5.6/300mm (411mm)</option>
    <option value="216">Xenar 4.5/360mm (432mm)</option>
    <option value="246">Symmar-S 6.8/360mm (491mm)</option>
    <option value="250">Symmar 5.6/360mm (500mm)</option>
    <option value="250">Super-Angulon 8/210mm (500mm)</option>
    <option value="250">Symmar-S 9.4/480mm (500mm)</option>
    <option value="250">Symmar-S 8.4/480mm (500mm)</option>
    <option value="253">Xenar 4.5/420mm (506mm)</option>
    <option value="290">Xenar 4.5/480mm (580mm)</option>
	</select>
</p>
