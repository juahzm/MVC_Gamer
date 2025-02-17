
{{ include('layouts/header.php', {title:'Components'})}}
<section class="flex-row">
<div class="h1">
<h1>COMPONENTS</h1>
</div>
<div>
<table>
<thead>
<tr>
<th>Component Name</th>
<th>Component Description</th>
<th>Component Guarantee</th>
<th>Component Price</th>
<th>Component Manufacturer<th>

</tr>
</thead>
<tbody>

{% for component in components %}

<tr>
<td>{{component.componentName}}</td>
<td>{{component.componentDescription}}</td>
<td>{{component.componentGuarantee}}</td>
<td>{{component.componentPrice}}</td>
<td>{{component.manufacturerNom}}></td>
<td> <a href="{{base}}/component/show?componentId={{component.componentId}}"  class="bouton">View</a></td>
<td>
<form action="component_delete.php" method="post">
<input type="hidden" name="id" value="{{Component.componentId}}">
<input type="submit" class="bouton_delete" value="delete">
</form>

</td>
</tr>
{% endfor %}


</tbody>

</table>

</div>

<div>
<br>
<br>

<a href="{{base}}/client/create" class="bouton">New Component</a>

</div>
</section>
{{ include('layouts/footer.php')}}
