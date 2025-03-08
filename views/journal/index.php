{{ include('layouts/header.php', {title:'Journal'})}}

<h1>Journal</h1>

<div>
{% for journal in journals %}

<p><strong>user Name :</strong> {{journal.journalUsername}}</p>
<p><strong>log time: </strong> {{journal.journalTime}}</p>
<p></strong>log IP address:</strong> {{journal.journalIp}}</p>
{% endfor %}

</div>



{{ include('layouts/footer.php')}}



