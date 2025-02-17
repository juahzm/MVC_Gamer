{{ include('layouts/header.php', {title:'Component'})}}

<div class="Info flex-row">
<div class="h1">
    <h1>Component</h1>
</div>
<p><strong>Component Name : </strong>{{component.componentName}}</p>
<p><strong>Component Description : </strong>{{component.componentDescription}}</p>
<p><strong>Component Guarantee : </strong>{{component.componentGuarantee}}</p>
<p><strong>Component Price : </strong>{{component.componentPrice}}<small> CAD</small></p>
<p><strong>Component Manufacturer : </strong>{{manufacturerNom}}</p>
<a href="{{base}}/component/edit?componentId={{component.componentId}}" class="bouton">Edit</a>
</div>


{{ include('layouts/footer.php')}}