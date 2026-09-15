---
title: 2022
year: 2022
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2022"]
---

![Sentinel tree](images/img20201215_21471241-3-819x1024.jpg)

{% for post in collections.2022 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
