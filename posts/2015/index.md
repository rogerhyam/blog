---
title: Posts from 2015
year: 2015
tags: year-page
eleventyExcludeFromCollections: ["post", "2015"]
---

{% for post in collections.2015 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
