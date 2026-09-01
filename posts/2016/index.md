---
title: Posts from 2016
year: 2016
tags: year-page
eleventyExcludeFromCollections: ["post", "2016"]
---

{% for post in collections.2016 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
