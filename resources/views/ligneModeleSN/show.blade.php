  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$ligneModeleSN->nombre}}
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>N° ligne</th>
            <th>Modéle de S\N</th>
            <th>Famille de S\N</th>
            <th>updated_at</th>
            <th>created_at</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$ligneModeleSN->id}}</td>
            <td>{{$ligneModeleSN->nombre}}</td>
            <td>
              <a href="{{ route('modeleSN.show', ['modeleSN' => $ligneModeleSN->modeleSNs->id]) }}">{{$ligneModeleSN->modeleSNs->id}}</a>
            </td>
            <td>
              <a href="{{ route('familleSN.show', ['familleSN' => $ligneModeleSN->familleSNs->id]) }}">{{$ligneModeleSN->familleSNs->id}}</a>
            </td>
            <td>{{$ligneModeleSN->updated_at}}</td>
            <td>{{$ligneModeleSN->created_at}}</td>
            
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
