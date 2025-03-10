{{ include('layouts/header.php', {title:'Journal'})}}

<div class="flex-row">
    <h1>Journal</h1>
    <table>
        <thead>
            <tr>
                <th><strong>user Name :</strong> </th>
                <th><strong>log time:</strong> </th>
                <th><strong>log IP address:</strong> </th>

            </tr>

        </thead>

        <tbody>
            {% for journal in journals %}
            <tr>

                <td>{{journal.journalUsername}}</td>
                <td>{{journal.journalTime}}</td>
                <td>{{journal.journalIp}}</td>

             </tr>
         {% endfor %}

        </tbody>

    </table>
    

</div>

{{ include('layouts/footer.php')}}



