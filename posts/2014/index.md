---
title: Posts from 2014
year: 2014
tags: year-page
eleventyExcludeFromCollections: ["post", "2014"]
---

{% for post in collections.2014 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
