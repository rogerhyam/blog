---
title: 2020
year: 2020
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2020"]
---

![The start of Covid and the end of my wet-plate career](images/IMG_20200229_170220-1024x768.jpg)

## The start of Covid and the end of my wet-plate career

{% for post in collections.2020 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
