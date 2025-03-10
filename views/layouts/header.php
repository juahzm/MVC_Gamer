
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{title}}</title>
<link rel="stylesheet" href="{{asset}}css/style.css">
</head>
<body>
<nav>
<ul>

{%if session.client_privilegeId == 1%}
<li><a href="{{base}}/generate-pdf">pdf</a></li>
<li><a href="{{base}}/journal">JournalDeBord</a></li>
{% endif%}

{% if guest is empty %}
<li><a href="{{base}}/component">Components</a></li>
{% endif%}


<li><a href="{{base}}/client/create">Create user</a></li>




{%if guest %}
<li><a href="{{base}}/login">Login</a></li>
{% else %}
<li><a href="{{base}}/logout">Logout</a></li>
{%endif%}


</ul>
</nav>
<main>

 <div>
    {% if guest is empty %}
  {{session.client_name}}
  {% endif%}
</div>

   


