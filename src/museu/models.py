# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models
from django.contrib.auth.models import User


class Arquivo(models.Model):
    codarq = models.AutoField(primary_key=True)
    nomarq = models.CharField(max_length=20, verbose_name='Arquivo')
    dtaarq = models.DateTimeField()
    arqarq = models.BinaryField()
    codobj = models.ForeignKey('Objeto', models.DO_NOTHING, db_column='codobj')

    class Meta:
        managed = False
        db_table = 'arquivo'
        
    def __str__(self):
        return self.nomarq


class Autor(models.Model):
    codaut = models.AutoField(primary_key=True)
    nomaut = models.CharField(max_length=80, verbose_name='Autor')
    bioaut = models.TextField(blank=True, null=True, verbose_name='Biografia')

    class Meta:
        managed = False
        db_table = 'autor'
        
    def __str__(self):
        return self.nomaut


class Bairro(models.Model):
    codbar = models.AutoField(primary_key=True)
    nombar = models.CharField(max_length=70, verbose_name='Bairro')

    class Meta:
        managed = False
        db_table = 'bairro'
        
    def __str__(self):
        return self.nombar


class Categoria(models.Model):
    codcat = models.AutoField(primary_key=True)
    nomcat = models.CharField(max_length=80, verbose_name='Categoria')
    dsccat = models.TextField(blank=True, null=True, verbose_name='Descrição')

    class Meta:
        managed = False
        db_table = 'categoria'
    
    def __str__(self):
        return self.nomcat


class Cidade(models.Model):
    codcid = models.AutoField(primary_key=True)
    nomcid = models.CharField(max_length=70, verbose_name='Cidade')
    codest = models.ForeignKey('Estado', models.DO_NOTHING, db_column='codest')

    class Meta:
        managed = False
        db_table = 'cidade'
    
    def __str__(self):
        return self.nomcid


class Endereco(models.Model):
    codend = models.AutoField(primary_key=True)
    logend = models.CharField(max_length=100, verbose_name='Endereço')
    numend = models.IntegerField(blank=True, null=True, verbose_name='Número')
    compend = models.CharField(max_length=30, blank=True, null=True, verbose_name='Complemento')
    codbar = models.ForeignKey(Bairro, models.DO_NOTHING, db_column='codbar')
    codcid = models.ForeignKey(Cidade, models.DO_NOTHING, db_column='codcid')
    codpes = models.ForeignKey('Pessoa', models.DO_NOTHING, db_column='codpes')

    class Meta:
        managed = False
        db_table = 'endereco'
        
    def __str__(self):
        return "{} {}".format(self.logend, self.numend)


class Estado(models.Model):
    codest = models.AutoField(primary_key=True)
    ufest = models.CharField(max_length=2, verbose_name='UF')
    codpas = models.ForeignKey('Pais', models.DO_NOTHING, db_column='codpas')

    class Meta:
        managed = False
        db_table = 'estado'
        
    def __str__(self):
        return self.ufest


class Funcionario(models.Model):
    codfun = models.AutoField(primary_key=True)
    fncfun = models.CharField(max_length=50, verbose_name='Função')
    slafun = models.DecimalField(max_digits=19, decimal_places=2, blank=True, null=True, verbose_name='Salário')
    dtaadmfun = models.DateField(verbose_name='Data da Admissão')
    codpes = models.ForeignKey('Pessoa', models.DO_NOTHING, db_column='codpes')
    codins = models.ForeignKey('Instituicao', models.DO_NOTHING, db_column='codins')

    class Meta:
        managed = False
        db_table = 'funcionario'


class Instituicao(models.Model):
    codins = models.AutoField(primary_key=True)
    nomins = models.CharField(max_length=80, verbose_name='Instituição')
    cnpjins = models.CharField(max_length=18, verbose_name='CNPJ')
    ufins = models.CharField(max_length=2, verbose_name='UF')

    class Meta:
        managed = False
        db_table = 'instituicao'
        
    def __str__(self):
        return self.nomins


class Objeto(models.Model):
    codobj = models.AutoField(primary_key=True)
    nomobj = models.CharField(max_length=50, verbose_name='Nome')
    dscobj = models.TextField(blank=True, null=True, verbose_name='Descrição')
    orgobj = models.CharField(max_length=255, blank=True, null=True, verbose_name='Origem')
    codins = models.ForeignKey(Instituicao, models.DO_NOTHING, db_column='codins')
    codcat = models.ForeignKey(Categoria, models.DO_NOTHING, db_column='codcat')
    codsta = models.ForeignKey('Status', models.DO_NOTHING, db_column='codsta')

    class Meta:
        managed = False
        db_table = 'objeto'
        
    def __str__(self):
        return self.nomobj


class ObjetoAutor(models.Model):
    codobj = models.ForeignKey(Objeto, models.DO_NOTHING, db_column='codobj', primary_key=True)
    codaut = models.ForeignKey(Autor, models.DO_NOTHING, db_column='codaut')

    class Meta:
        managed = False
        db_table = 'objeto_autor'
        unique_together = (('codobj', 'codaut'),)


class Pais(models.Model):
    codpas = models.AutoField(primary_key=True)
    nompas = models.CharField(max_length=50, verbose_name='País')

    class Meta:
        managed = False
        db_table = 'pais'
        
    def __str__(self):
        return self.nompas


class Pessoa(models.Model):
    codpes = models.AutoField(primary_key=True)
    nompes = models.CharField(max_length=80, verbose_name='Nome')
    cpfpes = models.CharField(max_length=14, verbose_name='CPF')
    dtanascpes = models.DateField(blank=True, null=True, verbose_name='Data de Nascimento')
    sexpes = models.CharField(max_length=1, blank=True, null=True, verbose_name='Sexo')

    class Meta:
        managed = False
        db_table = 'pessoa'
        
    def __str__(self):
        return "{} - {}".format(self.nompes, self.cpfpes)


class Proprietarioinstituicao(models.Model):
    codproins = models.AutoField(primary_key=True)
    nomproins = models.CharField(max_length=30, verbose_name='Nome')
    codins = models.ForeignKey(Instituicao, models.DO_NOTHING, db_column='codins')

    class Meta:
        managed = False
        db_table = 'proprietarioinstituicao'
        
    def __str__(self):
        return self.nomproins


class Status(models.Model):
    codsta = models.AutoField(primary_key=True)
    nomsta = models.CharField(max_length=20, verbose_name='Status')

    class Meta:
        managed = False
        db_table = 'status'
        
    def __str__(self):
        return self.nomsta


class Telefone(models.Model):
    codtel = models.AutoField(primary_key=True)
    aretel = models.IntegerField(verbose_name='Área')
    numtel = models.IntegerField(verbose_name='Telefone')
    codpes = models.ForeignKey(Pessoa, models.DO_NOTHING, db_column='codpes')

    class Meta:
        managed = False
        db_table = 'telefone'
        
    def __str__(self):
        return "({}){}".format(self.aretel, self.numtel)


class Visita(models.Model):
    codvst = models.AutoField(primary_key=True)
    dtavst = models.DateField(verbose_name='Data')
    hravst = models.TimeField(verbose_name='Horário')
    codvis = models.ForeignKey('Visitante', models.DO_NOTHING, db_column='codvis')

    class Meta:
        managed = False
        db_table = 'visita'


class Visitante(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    codvis = models.AutoField(primary_key=True)
    codpes = models.ForeignKey(Pessoa, models.DO_NOTHING, db_column='codpes')
    emavis = models.CharField(max_length=20, verbose_name='E-mail')

    class Meta:
        managed = False
        db_table = 'visitante'
