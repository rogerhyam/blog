---
title: Posts from 2021
year: 2021
tags: year-page
eleventyExcludeFromCollections: ["post", "2021"]
---

{% for post in collections.2021 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
