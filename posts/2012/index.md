---
title: Posts from 2012
year: 2012
tags: year-page
eleventyExcludeFromCollections: ["post", "2012"]
---

{% for post in collections.2012 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}