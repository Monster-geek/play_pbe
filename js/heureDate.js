function date_heure(id)
{
        date = new Date;
        annee = date.getFullYear();
        moi = date.getMonth();
        mois = new Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
        j = date.getDate();
        jour = date.getDay();
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        resultat = ' '+j+'/'+mois[moi]+'/'+annee+'   '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = resultat;
        setTimeout('date_heure("'+id+'");','1000');
        return true;
}
