function fonction()
{
    var nom = f.nom.value;
    var directeur = f.directeur.value;
    var desc_eve = f.desc_eve.value;
    if(nom.length ==0 || directeur.length ==0 || desc_eve.length ==0 )
    {
        alert("veuillez verifier votre données");
    } else
    if(nom.length<3)
    {
        alert("votre nom doit contenir au minimum 3 caractéres");
    } 
    else if(directeur.length<3)
    {
        alert("votre nom directeur doit contenir au minimum 3 caractéres");
    }
    else if(desc_eve.length<10)
    {
        alert("votre descreption doit contenir au minimum 10 caractéres");
    }
    
   
   
}