

module.exports = async function(eleventyConfig) {

    eleventyConfig.addPassthroughCopy("style");
    eleventyConfig.addPassthroughCopy("scripts");

    eleventyConfig.addPassthroughCopy("**/*.jpeg");
	eleventyConfig.addPassthroughCopy("**/*.jpg");
    eleventyConfig.addPassthroughCopy("**/*.png");
    eleventyConfig.addPassthroughCopy("**/*.pdf");
    eleventyConfig.addPassthroughCopy("**/*.zip");
    
    const { HtmlBasePlugin } = await import("@11ty/eleventy");
    eleventyConfig.addPlugin(HtmlBasePlugin);

};


module.exports.config = {
}