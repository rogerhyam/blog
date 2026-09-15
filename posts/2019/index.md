---
title: 2019
year: 2019
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2019"]
---

![Trees, Dalkeith](images/Dad-025-1024x757.jpg)

{% for post in collections.2019 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
