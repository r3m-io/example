{{R3M}}
{{$register = Package.R3m.Io.Example:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Example:Import:role.system()}}
{{Package.R3m.Io.Example:Configure:site()}}
{{/if}}