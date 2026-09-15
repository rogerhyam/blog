---
title: 2014
year: 2014
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2014"]
---

![Pentlands?](images/14983125210_97242f4ec3_o-1024x576.jpg)

{% for post in collections.2014 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
