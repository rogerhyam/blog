---
title: Posts from 2010
year: 2010
tags: year-page
eleventyExcludeFromCollections: ["post", "2010"]
---

![Snow this year](images/IMG_3089.jpg)

{% for post in collections.2010 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}