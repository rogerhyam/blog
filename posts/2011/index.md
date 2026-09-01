---
title: Posts from 2011
year: 2011
tags: year-page
eleventyExcludeFromCollections: ["post", "2011"]
---

{% for post in collections.2011 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}