---
title: Roger's Blog
styleClass: indexPage
layout: blog.html
---

This place is an eclectic mix of posts on different subjects. It contains opinions (and some facts) on biodiversity informatics, mindfulness, Buddhism, photography, politics, media and stuff in general. These are the publications from a one man think tank with no budget and no time. Occasionally the spelling is correct and the English is quite good - see if you can spot when.

There are posts going back nearly two decades. Some are embarrassing and make me cringe but I've left them in. Some don't work anymore because they are based on technologies that have disappeared.

## Featured posts

{% for post in collections.featured %}
- [{{post.data.title}}]({{post.url}}) {{post.data.abstract}} ({{ post.date | date: '%B %Y', 'UCT' }})
{% endfor %}


## Latest posts

{% for post in collections.post reversed  %}
{% if forloop.index > 10 %}
{% break %}
{% endif %}
- {{ post.date | date: '%Y - %d %B ', 'UCT' }} - [{{post.data.title}}]({{post.url}})
{% endfor %}


