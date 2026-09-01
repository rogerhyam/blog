---
title: Posts from 2024
year: 2024
tags: year-page
eleventyExcludeFromCollections: ["post", "2024"]
---

{% for post in collections.2024 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
