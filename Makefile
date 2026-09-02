create_dependency-brick-date-time:
	cd dependency-brick-date-time && \
	make create_package

create_dependency-guzzle:
	cd dependency-guzzle && \
	make create_package

create_dependencies: create_dependency-brick-date-time create_dependency-guzzle

create_package:
	cd fg && \
	make create_package

create_package_workaround:
	cd fg && \
	make create_package

.PHONY: create_dependency-brick-date-time create_dependency-guzzle create_dependencies create_package create_package_workaround
