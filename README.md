# API REST - Biblioteca

Esta es la documentación de la API REST para gestionar una biblioteca. A continuación se describen los endpoints disponibles, junto con ejemplos de peticiones y respuestas.

## Endpoints


#### Ejemplo de peticiones:

```bash
GET /books
[
  {
    "id": 1,
    "title": "El Principito",
    "author": "Antoine de Saint-Exupéry",
    "year": 1943
  },
  {
    "id": 2,
    "title": "1984",
    "author": "George Orwell",
    "year": 1949
  }
]
GET /books/1
{
  "id": 1,
  "title": "El Principito",
  "author": "Antoine de Saint-Exupéry",
  "year": 1943
}
POST /books
Content-Type: application/json
{
  "title": "Cien años de soledad",
  "author": "Gabriel García Márquez",
  "year": 1967
}
{
  "id": 3,
  "title": "Cien años de soledad",
  "author": "Gabriel García Márquez",
  "year": 1967
}
PUT /books/1
Content-Type: application/json
{
  "title": "El Principito",
  "author": "Antoine de Saint-Exupéry",
  "year": 1943,
  "genre": "Ficción"
}
DELETE /books/1
{
  "message": "Libro eliminado con éxito"
}

