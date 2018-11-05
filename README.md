# UI-Seminar Docker environment

## Usefull commands for docker
Get a list of active containers:
`docker container ls`

Get a bash inside the container (either container id or name):
`docker exec -i -t ui_seminar_web_1 /bin/bash`

Get information on container (e.g IP):
`docker inspect containerID`

Recreate the database volumes by removing the old container:
`docker-compose -rm mysql`