---
title: Posts from 2020
year: 2020
tags: year-page
eleventyExcludeFromCollections: ["post", "2020"]
---

{% for post in collections.2020 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
