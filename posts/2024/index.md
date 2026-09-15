---
title: 2024
year: 2024
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2024"]
---

![Friends on the beach](images/img20240203_16570290-1024x712.jpg)

{% for post in collections.2024 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
