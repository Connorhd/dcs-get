#####################
# dcs-get installer #
#####################
function _dcs-get()
{
if [[ ! -n "$SSH_TTY"  && ! -z "$PS1" ]]
then
        if [[ ! -d /var/tmp/dcs-get || ! -O /var/tmp/dcs-get ]]
        then
                cd /var/tmp
		wget -q -T 1 -t 2 http://backus.uwcs.co.uk/dcs-get/dcs-get-install
                if [[ -e /var/tmp/dcs-get-install ]]; then
                	chmod u+x dcs-get-install
			./dcs-get-install "1.0"
			if [ $? -ne 0 ]
			then
				rm dcs-get-install
				cd
				return 1
			fi
			rm dcs-get-install
		else
			echo "Backus is down, dcs-get is currently unavailiable."
		fi
		cd
        fi
	if [[ -d /var/tmp/dcs-get && -O /var/tmp/dcs-get ]]
	then
        	export LD_LIBRARY_PATH=/var/tmp/dcs-get/lib
		export PKG_CONFIG_PATH=/var/tmp/dcs-get/lib/pkgconfig
        	export PATH=/var/tmp/dcs-get/bin:$PATH
#####################
# Add dcs-get install (package)-(version)
# below this comment (and before both 'fi') to install packages on login
#####################
	fi
fi
}

_dcs-get
#####################
# END dcs-get       #
#####################
