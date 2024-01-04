{{R3M}}
{{$register = Package.R3m.Io.Example:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Example:Import:role.system()}}
{{$options = options()}}
{{Package.R3m.Io.Example:Main:site($options)}}
{{$host.create = Package.R3m.Io.Example:Main:host.create($options)}}
{{$host.mapper.create = Package.R3m.Io.Example:Main:host.mapper.create($options)}}
{{$host.name.create = Package.R3m.Io.Example:Main:host.name.create($options)}}
{{/if}}