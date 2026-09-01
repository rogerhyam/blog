---
title: Posts from 2022
year: 2022
tags: year-page
eleventyExcludeFromCollections: ["post", "2022"]
---

{% for post in collections.2022 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
