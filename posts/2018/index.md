---
title: Posts from 2018
year: 2018
tags: year-page
eleventyExcludeFromCollections: ["post", "2018"]
---

{% for post in collections.2018 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
