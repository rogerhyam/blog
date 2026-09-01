module.exports = async function(eleventyConfig) {

    eleventyConfig.addPassthroughCopy("style");
    eleventyConfig.addPassthroughCopy("scripts");

    eleventyConfig.addPassthroughCopy("**/*.jpeg");
	eleventyConfig.addPassthroughCopy("**/*.jpg");
    eleventyConfig.addPassthroughCopy("**/*.png");
    eleventyConfig.addPassthroughCopy("**/*.pdf");
    eleventyConfig.addPassthroughCopy("**/*.zip");
    
};