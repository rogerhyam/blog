---
title: Posts from 2026
year: 2026
tags: year-page
eleventyExcludeFromCollections: ["post", "2026"]
---

![Snap from the Pentlands](images/pentlands_2026.jpg)

{% for post in collections.2026 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
