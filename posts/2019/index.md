---
title: Posts from 2019
year: 2019
tags: year-page
eleventyExcludeFromCollections: ["post", "2019"]
---

{% for post in collections.2019 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
