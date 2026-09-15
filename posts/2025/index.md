---
title: 2025
year: 2025
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2025"]
---

![Screenshot from new website](splash.jpg)

2025 was a fallow year for the blog. I mistakenly put my energy into YouTube and WordPress was getting on my nerves as a blogging platform.

{% for post in collections.2025 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
