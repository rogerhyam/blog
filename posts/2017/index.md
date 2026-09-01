---
title: Posts from 2017
year: 2017
tags: year-page
eleventyExcludeFromCollections: ["post", "2017"]
---

{% for post in collections.2017 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
