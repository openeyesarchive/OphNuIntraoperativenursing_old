<?php

class DefaultController extends BaseEventTypeController
{
	public function actionCreate()
	{
		parent::actionCreate();
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
	}

	public function locationHidden($element)
	{
		if (!empty($_POST)) {
			return !@$_POST['Element_OphNuIntraoperativenursing_Details']['grounding_pad'];
		}

		return !$element->grounding_pad;
	}

	public function timeFieldsHidden($element)
	{
		if (!empty($_POST)) {
			return (@$_POST['Element_OphNuIntraoperativenursing_Details']['nasal_or_throat_pack_id'] <1 || @$_POST['Element_OphNuIntraoperativenursing_Details']['nasal_or_throat_pack_id'] >2);
		}

		return ($element->nasal_or_throat_pack_id <1 || $element->nasal_or_throat_pack_id >2);
	}
}
