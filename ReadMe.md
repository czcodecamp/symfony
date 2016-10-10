
docker build --rm -t codecamp .

docker run -d -p 3306:3306  --restart always --name percona --env MYSQL_ROOT_PASSWORD=root percona/percona-server

docker run -it --net host -v /c/Users/vasek/Projects/codecamp:/mnt --name codecamp codecamp