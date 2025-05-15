# DeckHub

DeckHub es una plataforma web donde puedes construir, organizar y compartir tus mazos de tus TCG (Trading Card Games) favoritos. Crea una cuenta, arma tus mazos personalizados y compártelos con la comunidad.

## 🚀 Requisitos

- Docker
- Docker Compose
- Git

## ⚙️ Instalación

Clona el repositorio:

```bash
git clone https://github.com/dcaceresc/deckhub.git
cd deckhub
```

Copia el archivo de entorno:

```bash
cp .env.example .env
```

Instala las dependencias:

```bash
composer install
```

Genera la clave de la aplicación:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
```

### 🐳 Usando Laravel Sail

DeckHub utiliza Laravel Sail como entorno de desarrollo con Docker.

Levantar los contenedores

```bash
./vendor/bin/sail up -d
```

Bajar los contenedores

```bash
./vendor/bin/sail down
```

## 🛠 Migraciones y Seeders

```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

## 🌐 Acceder a la aplicación

```bash
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
```

## 🤝 Contribuir

¡Las contribuciones son bienvenidas! Si encuentras un bug o quieres sugerir una mejora, abre un issue o un pull request.


## 📝 Licencia

Este proyecto está bajo la licencia MIT.