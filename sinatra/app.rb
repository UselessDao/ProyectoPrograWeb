require 'sinatra'

get '/' do 
	'hola'
end

get '/login' do
	locals = {
		:title => 'Bienvenidos',
		:mensaje => ''
	}
	erb :'login', :locals => locals
end

post '/login/acceder' do
	usuario = params[:usuario]
	contrasena = params[:contrasena]

	if usuario == 'st' && contrasena == 'claveSecreta'
		'Accediste'
	else	
		locals = {
			:title => 'Bienvenidos',
			:mensaje => 'Usuario o clave incorrectos'
		}
		erb :'login', :locals => locals
	end

end