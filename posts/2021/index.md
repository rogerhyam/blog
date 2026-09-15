---
title: 2021
year: 2021
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2021"]
---

![Plate photography during Covid](images/img20210307_13480687-1024x774.jpg)

## Covid-19 still hangs over us.

{% for post in collections.2021 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
