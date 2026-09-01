---
title: Posts from 2025
year: 2025
tags: year-page
eleventyExcludeFromCollections: ["post", "2025"]
---

![Screenshot from new website](splash.jpg)

{% for post in collections.2025 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
