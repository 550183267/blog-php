#���˲���PHP+MYSQL��̨
ע�����ݿ�sql�ű��ļ���SQL�ļ�������ݿ���Ϊ��blog,���ݱ���Ϊ��article/land��
src�ļ�������δ��ѹ���ϲ���Դ�ļ�
dist�ļ���ѹ������ļ�

1.��reg.php��land.php��ʹ��md5()�������û��������
$password = md5(addslashes(htmlspecialchars($_POST['password'])));

2.ʹ��session��¼��½״̬

3.ʹ��Token����CSRF����
session_start();
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

<input type="hidden" name="token" value="<?php echo $token; ?>" class="form-control" >

if ($_POST['token'] == $_SESSION['token']) {
//��ӵ����ݿ�
}

4.��add.php��upadte.php����PHP htmlspecialchars()�����������Ԥ������ַ�ת��Ϊ HTML ʵ��
$category =addslashes(htmlspecialchars($_POST['category']));//���
$title = addslashes(htmlspecialchars($_POST['title']));//����
$editor = addslashes(htmlspecialchars($_POST['editor']));//����
$time = htmlspecialchars($_POST['time']);//ʱ��
��������ֹ�û�������������ݻ��߱༭������������ʱ����Ԥ������ַ��� ��< �� >��������������� HTML Ԫ�أ���ֹxssע�룩

