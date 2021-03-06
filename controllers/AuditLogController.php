<?php 
namespace Craft;

class AuditLogController extends BaseController
{

    public function actionDownload()
    {
    
        // Get criteria
        $criteria = craft()->elements->getCriteria('AuditLog', craft()->request->getParam('criteria'));
        
        // Get order and sort
        $viewState = craft()->request->getParam('viewState', array(
            'order' => 'id',
            'sort' => 'desc'
        ));
        
        // Set sort on criteria
        $criteria->order = $viewState['order'].' '.$viewState['sort'];
        
        // Did we search?
        $criteria->search = craft()->request->getParam('search');
        
        // Get source
        $criteria->source = craft()->request->getParam('source', '*');
        
        // Get data
        $log = craft()->auditLog->log($criteria);
        
        // Get element type
        $elementType = craft()->elements->getElementType('AuditLog');
        
        // Set status attribute
        $attributes['status'] = Craft::t('Status');
        
        // Get table attributes
        $attributes += $elementType->defineTableAttributes();
        
        // Ditch the changes button
        unset($attributes['changes']);
            
        // Re-order data
        $data = StringHelper::convertToUTF8('"'.implode('","', $attributes)."\"\r\n"); 
        foreach($log as $element) {
        
            // Gather parsed fields
            $fields = array();
        
            // Parse fields
            foreach($attributes as $handle => $field) {
                $fields[] = $handle == 'status' ? $elementType->getStatuses()[$element->$handle] : strip_tags($elementType->getTableAttributeHtml($element, $handle));
            }
        
            // Set data
            $data .= StringHelper::convertToUTF8('"'.implode('","', $fields)."\"\r\n");
            
        }
                
        // Download the file
        craft()->request->sendFile('auditlog.csv', $data, array('forceDownload' => true, 'mimeType' => 'text/csv'));
    
    }

}